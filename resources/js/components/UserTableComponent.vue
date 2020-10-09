<template>
  <tr>
    <td>{{ user.name }}</td>
    <td>{{ user.email }}</td>
    <td>{{ user.password }}</td>
    <td>
      <img
        class="rounded-circle"
        src="https://picsum.photos/200"
        alt=""
        width="50px"
      />
    </td>
    <td>
      <a href="#" class="btn btn-success btn-circle"
        ><i class="far fa-edit"></i
      ></a>
      <a href="#" class="btn btn-danger btn-circle"
        ><i class="fas fa-trash"></i
      ></a>
    </td>
  </tr>
</template>

<script>
export default {
  props: ["user"],
  data() {
    return {};
  },
};
</script>