import "./assets/main.css";

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

// Add icons to library
library.add(faUser, faHome, faGithub)

const app = createApp(App);

app.use(router);

app.mount("#app");
