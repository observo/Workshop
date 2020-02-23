export default function (context) {
  const { store, redirect, route } = context
  const { auth } = store.state

  // Autenticação desabilitada por hora em desenovlvimento
  if (
    // process.env.NODE_ENV !== 'development' &&
    !auth.publicPages.includes(route.name) &&
    !auth.payload
  ) {
    return redirect('/frontend/user/login/')
  }
}
