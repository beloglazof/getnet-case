const baseURL = 'http://localhost:4000';
const post = async (url = '', data = {}) => {
  const response = await fetch(url, {
    method: 'POST',
    mode: 'cors',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data),
  });
  const json = await response.json();
  return json;
};

const get = async (url, data = {}) => {
  const response = await fetch(url, {
    mode: 'cors',
  });
  const json = await response.json();
  return json;
}

const put = async (url, data = {}) => {
  const response = await fetch(url, {
    method: 'PUT',
    mode: "cors",
    cache: 'no-cache',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
  });

  const json = await response.json();
  return json;
}

export const signIn = async (email, password) => {
  const response = await post(`${baseURL}/authentication`, { email, password });
  return response;
}

export const register = async (email, password) => {
  const response = await post(`${baseURL}/registration`, { email, password });
  return response.message;
}

export const getUser = async (token) => {
  const response = await get(`${baseURL}/users/${token}`);
  return response;
}

export const updateUser = async (token, firstname, lastname) => {
  const response = await put(`${baseURL}/users/${token}`, {firstname, lastname});
  return response;
}

export const getBalanceDetails = async (page, limit = 10) => {
  const response = await get(`${baseURL}/balance/${page}?limit=${limit}`);
  return response;
}

export const getServices = async (page, limit = 10) => {
  const response = await get(`${baseURL}/services/${page}?limit=${limit}`);
  return response;
}