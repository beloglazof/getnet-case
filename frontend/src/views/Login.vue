<template>
  <b-container>
    <b-row>
      <b-col>
        <b-card title="Авторизация" tag="article">
          <b-form @submit.prevent="onSubmit">
            <p v-if="error" v-model="message"></p>
            <b-form-group id="email-input-group" label="email" label-for="email">
              <b-form-input
                id="email"
                v-model="form.email"
                type="email"
                placeholder="example@mail.com"
                required
              ></b-form-input>
            </b-form-group>
            <b-form-group id="password-input-group" label="password" label-for="password">
              <b-form-input id="password" v-model="form.password" type="password" required></b-form-input>
            </b-form-group>

            <b-button type="submit" variant="primary">Вход</b-button>
            <router-link to="/registration">Регистрация</router-link>
          </b-form>
        </b-card>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import auth from '../auth';

export default {
  data() {
    return {
      form: {
        email: '',
        password: '',
      },
      error: false,
      message: '',
    };
  },
  methods: {
    async onSubmit(e) {
      const { email, password } = this.form;
      const [authenticated, message] = await auth.login(email, password);
      if (authenticated) {
        this.$router.replace(this.$route.query.redirect || '/');
      }
    },
  },
};
</script>
