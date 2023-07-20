// Estrapolo i metodi che mi servono
const { createApp } = Vue;
// Inizializzo l'app Vue
const app = createApp({
  data() {
    return {
      tasks: [],
      newTask: '',
    };
  },
  methods: {
    addNewTask() {
      const data = { text: this.newTask };
      const config = { headers: { 'Content-Type': 'multipart/form-data' } };

      axios
        .post('http://localhost/php-todo-list-json/api/tasks/', data, config)
        .then(res => {
          console.log('Task added');
          this.tasks = res.data;

          this.newTask = '';
        });
    },
    changeStatus(currentId) {
      const data = { id: currentId };
      const config = { headers: { 'Content-Type': 'multipart/form-data' } };

      axios
        .post('http://localhost/php-todo-list-json/api/tasks/', data, config)
        .then(res => {
          this.tasks = res.data;
          console.log('changed status');
        });
    },
  },
  created() {
    axios.get('http://localhost/php-todo-list-json/api/tasks/').then(res => {
      this.tasks = res.data;
    });
  },
});
// La monto nell'html
app.mount('#root');
