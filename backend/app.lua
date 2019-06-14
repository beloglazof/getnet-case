#!/usr/bin/env tarantool
local uuid = require('uuid')

box.cfg{}

local function create_database()
  local users_space = box.schema.space.create('users', {
    if_not_exists = true
  })
  users_space:create_index('primary', {
    type = 'hash',
    parts = {1},
    if_not_exists = true
  })
  users_space:create_index('email_index', {
    type = 'tree',
    unique = true,
    parts = {2},
    if_not_exists = true
  })
  users_space:create_index('credentials_index', {
    type = 'tree',
    unique = true,
    parts = {2, 'string', 3, 'string'},
    if_not_exists = true
  })
end

create_database()

local function handler(self)
  return self:render{ json = { ['message'] = 'it works' } }
end

local function get_user_by_email(email)
  local users = box.space.users
  return users.index['email_index']:select({email})[1]
end

local function register(email, password)
  local response = {}
  local is_user_exist = get_user_by_email(email)
  if is_user_exist then
    response.message = 'User exist'
    response.error = true
    return response
  end
  local users = box.space.users
  local user_id = uuid.str()
  users:insert{
    user_id,
    email,
    password
  }
  response.message = 'Success'
  response.error = false
  return response
end

local function handle_registration(self)
  local email = self:param('email')
  local password = self:param('password')
  local req = self:json()
  -- local response = register(email, password)
  local r = self:render{ json = req }
  r.headers = { ['Access-Control-Allow-Origin'] = '*' }
  return r
end

local function handle_authentication(self)
  local method = self.method
  if method == 'POST' then
    local email = self:post_param('email')
    local password = self:post_param('password')
    local users = box.space.users
    local user = users.index['credentials_index']:select({email, password})[1]

    if user ~= nil then
      local response = self:render{ json = {['message'] = 'Success', ['error'] = false } }
      response:setcookie({ name = 'uid', value = user[1], expires = '1d' })
      return response
    end

    local response = self:render{ json = {['message'] = 'Wrong login or password', ['error'] = true} }
    response.status = 403
    return response
  end
end

local server = require('http.server').new(nil, 8080)
server:route({ path = '/' }, handler)
server:route({ path = '/registration' }, handle_registration)
server:route({ path = '/auth' }, handle_authentication)
server:start()