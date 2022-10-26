const path = require("path");

module.exports = {
    resolve: {
        fallback: {
            stream: require.resolve("stream-browserify"),
        },
        alias: {
            "@": path.resolve("./resources/js"),
        },
    },
};
