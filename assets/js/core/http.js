import axios from "axios";

const http = axios.create();

http.interceptors.request.use(
  function (config) {
    const appToken = sessionStorage.getItem("app-token");

    if (appToken) {
      config.headers["X-AUTH-TOKEN"] = appToken;
    }

    return config;
  },
  function (error) {
    return Promise.reject(error);
  }
);

export default http;
