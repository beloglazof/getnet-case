<template>
  <b-container>
    <b-row>
      <b-col>
        <b-form @submit.prevent="onSubmit">
          <h1>Регистрация</h1>
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
          <b-form-group
            id="repeat-password-input-group"
            label="repeat password"
            label-for="repeat-password"
          >
            <b-form-input
              id="repeat-password"
              v-model="form.repeatPassword"
              type="password"
              required
            ></b-form-input>
          </b-form-group>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Регистрация</button>
            <p class="mt-4 mb-0">
              Уже есть аккаунт?
              <router-link to="/login">Войти</router-link>
            </p>
          </div>
        </b-form>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import { register } from "../api";

export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
        repeatPassword: ""
      }
    };
  },
  methods: {
    onSubmit() {
      const { email, password } = this.form;
      register(email, password);
    }
  }
};
</script>
