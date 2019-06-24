from flask_restful import Resource, reqparse
from db import users
from utils import abort_if_user_doesnt_exist

parser = reqparse.RequestParser()
parser.add_argument('firstname', required=True, location="json")
parser.add_argument('lastname', required=True, location="json")


class Users(Resource):
    def get(self, token):
        abort_if_user_doesnt_exist(token)
        return users[token]

    def put(self, token):
        abort_if_user_doesnt_exist(token)
        args = parser.parse_args()
        firstname = args["firstname"]
        lastname = args["lastname"]
        user = users[token]
        user["firstname"] = firstname
        user["lastname"] = lastname
        return user
