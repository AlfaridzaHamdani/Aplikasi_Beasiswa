$(document).ready(function () {
  $("#formRegistration").validate({
    rules: {
      name: {
        required: true,
        minlength: 2,
      },
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 15,
      },
      semester: {
        required: true,
      },
      gpa: {
        required: true,
        number: true,
        min: 3,
        max: 4,
      },
      jenisBeasiswa: {
        required: true,
      },
    },
    messages: {
      name: {
        required: "Nama lengkap diperlukan",
        minlength: "Nama harus terdiri dari minimal 2 karakter",
      },
      email: {
        required: "Email diperlukan",
        email: "Masukkan alamat email yang valid",
      },
      phone: {
        required: "No Hp diperlukan",
        digits: "Hanya angka yang diperbolehkan",
        minlength: "Nomor HP harus terdiri dari minimal 10 angka",
        maxlength: "Nomor HP tidak boleh lebih dari 15 angka",
      },
      semester: {
        required: "Semester diperlukan",
      },
      gpa: {
        required: "IPK diperlukan",
        number: "Masukkan angka valid",
        min: "IPK tidak bisa kurang dari 3",
        max: "IPK tidak bisa lebih dari 4",
      },
      jenisBeasiswa: {
        required: "Jenis beasiswa diperlukan",
      },
    },
    submitHandler: function (form) {
      if ($(form).valid()) {
        console.log("Form valid, submit form");
        form.submit();
      } else {
        console.log("Form tidak valid");
      }
    },
  });
});

$("#gpa").on("input", function () {
  var gpa = parseFloat($(this).val());

  if (gpa < 3) {
    $("#jenisBeasiswa").prop("disabled", true);
    $("#file").prop("disabled", true);
    $("#formRegistration button[type='submit']").prop("disabled", true);
  } else {
    $("#jenisBeasiswa").prop("disabled", false);
    $("#file").prop("disabled", false);
    $("#formRegistration button[type='submit']").prop("disabled", false);
  }
});
