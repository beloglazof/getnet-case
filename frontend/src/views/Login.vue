<template>
  <b-container>
    <b-row>
      <b-col>
        <b-card title="Авторизация" tag="article">
          <b-form>
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
export default {
  data() {
    return {
      form: {
        email: "",
        password: ""
      }
    };
  }
};
</script>