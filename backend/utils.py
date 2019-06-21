from hashlib import blake2b 
from flask_restful import abort
from db import accounts

def abort_if_user_doesnt_exist(id):
    if id not in accounts:
        abort(404, message="User doesn't exist")

def credentials_to_hash(email, password):
        h = blake2b()
        h.update(bytes(email+password, 'utf-8'))
        return h.hexdigest()