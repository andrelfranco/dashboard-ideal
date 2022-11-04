const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"login":{"uri":"login","methods":["GET","HEAD"]},"admin.index":{"uri":"admin","methods":["GET","HEAD"]},"admin.users.index":{"uri":"admin\/users","methods":["GET","HEAD"]},"admin.users.create":{"uri":"admin\/users\/create","methods":["GET","HEAD"]},"admin.users.store":{"uri":"admin\/users","methods":["POST"]},"admin.users.show":{"uri":"admin\/users\/{user}","methods":["GET","HEAD"]},"admin.users.edit":{"uri":"admin\/users\/{user}\/edit","methods":["GET","HEAD"]},"admin.users.update":{"uri":"admin\/users\/{user}","methods":["PUT","PATCH"]},"admin.users.destroy":{"uri":"admin\/users\/{user}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
