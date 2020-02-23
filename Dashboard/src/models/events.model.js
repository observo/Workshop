const NeDB = require('nedb')
/*
You can easily change the database server to anyone (which has native connector to feathers.
See more at https://docs.feathersjs.com/guides/basics/databases.html)
*/
module.exports = function (app) {
  // const dbPath = app.get('nedb')
  const Model = new NeDB({
    // filename: path.join(dbPath, 'mails.db'),
    autoload: true
  })

  return Model
}
