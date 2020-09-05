module.exports = {
  apps: [
    {
      name: "webpack-watch",
      script: "npm run watch",
      env: {
        NODE_ENV: "development",
      },
      env_production: {
        NODE_ENV: "production",
      },
    },
  ],
};
