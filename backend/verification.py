from flask_restful import Resource
from utils import abort_if_user_doesnt_exist
from db import users


class Verification(Resource):
    def get(self, id):
        abort_if_user_doesnt_exist(id)
        user = users[id]
        user["email_state"] = "verified"
        return {"message": "Well done"}
