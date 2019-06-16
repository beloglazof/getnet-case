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
  local req = self:json()
  local email = req.email
  local password = req.password
  local base_response = register(email, password)
  local response = self:render{ json = base_response }
  response.headers = { ['Access-Control-Allow-Origin'] = '*' }
  return response
end

local function authenticate(email, password)
  local users = box.space.users
  local user = users.index['credentials_index']:select({email, password})[1]
  if user == nil then 
    return nil 
  end

  local uid = user[1]
  return uid
end

local function handle_authentication(self)
  local req = self:json()
  local base_response = {}
  local email = req.email
  local password = req.password
  local uid = authenticate(email, password)
  local is_authenticated = uid ~= nil

  if is_authenticated then
    base_response.message = 'Success'
    base_response.error = false
    base_response.uid = uid
    local response = self:render{ json = base_response }
    -- response:setcookie({ name = 'uid', value = uid, domain = 'localhost', expires = '1d' })
    response.headers = { 
      ['Access-Control-Allow-Origin'] = '*',
     }
    return response
  end

  base_response.message = 'Wrong email or password'
  base_response.error = true
  local response = self:render{ json = base_response }
  response.headers = { ['Access-Control-Allow-Origin'] = '*' }
  return response
end

local server = require('http.server').new(nil, 8080)
server:route({ path = '/' }, handler)
server:route({ path = '/registration' }, handle_registration)
server:route({ path = '/auth' }, handle_authentication)
server:start()