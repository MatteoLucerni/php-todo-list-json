// Estrapolo i metodi che mi servono
const { createApp } = Vue;
// Inizializzo l'app Vue
const app = createApp({
  data() {
    return {
      tasks: [],
    };
  },
  created() {
    axios.get('http://localhost/php-todo-list-json/api/tasks').then(res => {
      this.tasks = res.data;
    });
  },
});
// La monto nell'html
app.mount('#root');