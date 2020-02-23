module.exports = function (app) {
  app.service('users').create({
    email: 'admin@domain.com',
    password: 'admin'
  })
}
