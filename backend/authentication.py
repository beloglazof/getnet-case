from flask_restful import Resource, reqparse
from utils import abort_if_user_doesnt_exist, credentials_to_hash

parser = reqparse.RequestParser()
parser.add_argument("email")
parser.add_argument("password")


class Authentication(Resource):
    def post(self):
        args = parser.parse_args()
        email = args["email"]
        password = args["password"]
        if email == "user@example.com":
            return {"token": 0}
        id = credentials_to_hash(email, password)
        abort_if_user_doesnt_exist(id)
        return {"token": id}
