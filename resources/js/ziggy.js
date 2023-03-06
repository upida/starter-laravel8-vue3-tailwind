const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"register.admin":{"uri":"register\/admin","methods":["POST"]},"register.user":{"uri":"register","methods":["POST"]},"login":{"uri":"login","methods":["POST"]},"me":{"uri":"me","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["GET","HEAD"]},"product.show":{"uri":"product","methods":["GET","HEAD"]},"product.show.id":{"uri":"product\/{id}","methods":["GET","HEAD"]},"product.store":{"uri":"product","methods":["POST"]},"product.update":{"uri":"product\/{id}","methods":["PUT"]},"product.destroy":{"uri":"product\/{id}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
