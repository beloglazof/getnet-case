from hashlib import blake2b
from flask_restful import abort
from db import accounts
import smtplib


def send_mail(to, body):
    try:
        sent_from = 'slavathedeveloper@gmail.com'
        subject = 'Verify email'

        email_text = """\
            From: %s
            To: %s
            Subject: %s

            %s
            """ % (sent_from, to, subject, body)

        gmail_user = sent_from
        gmail_pass = 'helloworld!8'
        server = smtplib.SMTP_SSL('smtp.gmail.com', 465)
        server.ehlo()
        server.login(gmail_user, gmail_pass)
        server.sendmail(sent_from, to, email_text)
        server.close()

    except EnvironmentError:
        return False


def send_verification_mail(to, id):
    activation_link = "http://localhost:4000/verification/" + id
    send_mail(to, activation_link.encode('ascii'))


def abort_if_user_doesnt_exist(id):
    if id not in accounts:
        abort(404, message="Пользователя не существует")


def credentials_to_hash(email, password):
    h = blake2b()
    h.update(bytes(email + password, "utf-8"))
    return h.hexdigest()


def get_page_count(data, limit):
    return len(data) // int(limit)


def get_data_by_page(data, page, limit):
    intPage = int(page)
    intLimit = int(limit)
    start = intLimit * (intPage - 1)
    end = intLimit * intPage
    return data[start:end]
