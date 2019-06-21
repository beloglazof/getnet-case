MONGO_URI = "mongodb+srv://bvd:25067@cluster0-q436o.mongodb.net/test?retryWrites=true&w=majority"
RESOURCE_METHODS = ['GET', 'POST', 'DELETE']
ITEM_METHODS = ['GET', 'PATCH', 'PUT', 'DELETE']

account_schema = {
  'email': {
      'type': 'string',
      'required': True,
      'unique': True,
  },
  'password': {
    'type': 'string',
    'required': True,
  },
  'roles': {
    'type': 'list',
    'allowed': ['user', 'admin'],
    'required': True,
  },
  'token': {
             'type': 'string',
             'required': True,
         }
}

accounts = {
  'item_title': 'account',
  'additional_lookup': {
    'url': 'regex("[\w]+")',
    'field': 'email',
  },
  'cache_control': '',
  'cache_expires': 0,
  'allowed_roles': ['admin'],
  'extra_response_fields': ['token'],
  'schema': account_schema,
}


DOMAIN = {'accounts': accounts }