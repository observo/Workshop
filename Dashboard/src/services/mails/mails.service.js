const createService = require('feathers-nedb')
const createModel = require('../../models/mails.model')
const hooks = require('./mails.hooks')
/*
You can easily change the database server to anyone (which has native connector to feathers.
See more at https://docs.feathersjs.com/guides/basics/databases.html)
*/
module.exports = function (app) {
  const Model = createModel(app)
  const paginate = app.get('paginate')

  const options = {
    Model,
    paginate
  }

  // Initialize our service with any options it requires
  app.use('/mails', createService(options))

  // Get our initialized service so that we can register hooks
  const service = app.service('mails')

  service.hooks(hooks)
}
