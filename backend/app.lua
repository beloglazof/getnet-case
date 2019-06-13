#!/usr/bin/env tarantool
local uuid = require('uuid')

box.cfg{listen=4000}

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
end

create_database()

local function handler(self)
  return self:render{ json = { ['Your-IP-Is'] = self.peer.host } }
end

local function get_user_by_email(email)
  local users = box.space.users
  return users.index['email_index']:select(email)[1]
end

local function register( email, password )
  local response = {}
  local is_user_exist = get_user_by_email(email)
  if is_user_exist then
    response.message = 'User ' .. email .. ' - exist'
    return response
  end
  local users = box.space.users
  local user_id = uuid.str()
  users:insert{
    user_id,
    email,
    password
  }
  response.message = 'User ' .. email .. ' - created'
  return response
end

local function handle_registration(self)
  local method = self.method
  if method == 'POST' then
    local email = self:post_param('email')
    local password = self:post_param('password')
    local response = register(email, password)
    return self:render{ json = response }
  end
end

local function handle_authenticaion(self)


local server = require('http.server').new(nil, 8080)
server:route({ path = '/' }, handler)
server:route({ path = '/register' }, handle_registration)
server:route({ path = '/auth' }, handle_authenticaion)
server:start()