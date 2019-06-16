const baseURL = 'http://localhost:4000';

export const auth = async (email, password) => {
  const response = await fetch(`${baseURL}/auth`, {
    method: 'POST',
    body: JSON.stringify({ email, password }),
    mode: 'cors',
  }).then(r => r.json());
  return response;
};

export const register = async (email, password) => {
  const response = await fetch(`${baseURL}/registration`, {
    method: 'POST',
    body: JSON.stringify({ email, password }),
    mode: 'cors',
  }).then(r => r.json());
  return response;
};
