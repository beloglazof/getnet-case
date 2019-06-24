from flask_restful import Resource, reqparse
from db import accounts, users
from utils import credentials_to_hash, send_verification_mail

parser = reqparse.RequestParser()
parser.add_argument("email")
parser.add_argument("password")


class Registration(Resource):
    def post(self):
        args = parser.parse_args()
        email = args["email"]
        password = args["password"]
        id = credentials_to_hash(email, password)
        accounts[id] = {
            "email": email,
            "password": password,
        }
        users[id] = {
            "firstname": "",
            "lastname": "",
            "balance": 0,
            "email_state": "unverified",
            }
        send_verification_mail(email, id)
        return {"message": "ok"}
