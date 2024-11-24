$(document).ready(function () {
  function loadUsers() {
    $.ajax({
      url: "users.php?action=getUsers",
      method: "GET",
      dataType: "json",
      success: function (data) {
        let rows = "";
        data.forEach(function (user) {
          rows += `
                        <tr>
                            <td>${user.id}</td>
                            <td>${user.name}</td>
                            <td>${user.role}</td>
                            <td>${user.mobile}</td>
                            <td>${user.email}</td>
                            <td>${user.address}</td>
                            <td>${user.gender}</td>
                            <td>${user.dob}</td>
                            <td>
                                <button class="btn btn-danger btn-sm deleteUser" data-id="${user.id}">Delete</button>
                            </td>
                        </tr>`;
        });
        $("#userTable").html(rows);
      },
    });
  }

  loadUsers();

  $(document).on("click", ".deleteUser", function () {
    const userId = $(this).data("id");
    if (confirm("Are you sure you want to delete this user?")) {
      $.ajax({
        url: "users.php?action=deleteUser",
        method: "POST",
        data: { id: userId },
        success: function (response) {
          alert(response);
          loadUsers();
        },
      });
    }
  });
});
