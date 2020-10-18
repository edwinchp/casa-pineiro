<template>
  <tr>
    <td v-if="editMode">
      <input type="text" class="form-control" v-model="user.name" />
    </td>
    <td v-else>{{ user.name }}</td>

    <td v-if="editMode">
      <input type="text" class="form-control" v-model="user.email" />
    </td>
    <td v-else>{{ user.email }}</td>

    <td v-if="editMode">
      <input type="text" class="form-control" v-model="user.password" />
    </td>
    <td v-else>{{ user.password }}aaaaaaaaaaaaa</td>

    <td>
      <img
        class="rounded-circle"
        src="https://picsum.photos/200"
        alt=""
        width="50px"
      />
    </td>
    <td>
      <!--UPDATE-->
      <button
        v-if="editMode"
        v-on:click="onClickUpdate()"
        href="#"
        class="btn btn-success btn-circle"
      >
        <i class="fas fa-save"></i>
      </button>

      <!--EDIT-->
      <button
        v-else
        v-on:click="onClickEdit()"
        href="#"
        class="btn btn-success btn-circle"
      >
        <i class="far fa-edit"></i>
      </button>

      <!--CANCEL-->
      <button
        v-if="editMode"
        v-on:click="onClickCancelChanges()"
        href="#"
        class="btn btn-danger btn-circle"
      >
        <i class="far fa-window-close"></i>
      </button>

      <!--DELETE-->
      <button
        v-else
        v-on:click="onClickDelete()"
        href="#"
        class="btn btn-danger btn-circle"
      >
        <i class="fas fa-trash"></i>
      </button>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["user"],
  data() {
    return {
      editMode: false,
    };
  },

  methods: {
    onClickDelete() {
      this.$emit("delete");
    },

    onClickEdit() {
      this.editMode = !this.editMode;
    },

    onClickUpdate() {
      axios.put('/apiUsers/${this.user.id}').then((response) => {
        this.editMode = !this.editMode;
        const user = response.data;
        this.$emit("update", user);
      });
    },

    onClickCancelChanges() {
      this.editMode = !this.editMode;
    },
  },
};
</script>