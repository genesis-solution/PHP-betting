async function msgBox({icon, title, duration = 1500, location = "", isConfirm = false, cb = () => {}}) {
  if (isConfirm) {

    let submit = false;

    await Swal.fire({
      title: `<h5 style='color:white; margin-bottom:10px;'> ${title} </h5>`,
      icon,
      background: "#333333",
      position: "center",
      width: "400px",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Submit",
    }).then((result) => {
      if (result.isConfirmed) {
        submit = true;
      } 
    });
    
    return submit;
  } else {
    
    Swal.fire({
      position: "center",
      width: "300px",
      icon,
      title: `<h5 style='color:white'> ${title} </h5>`,
      showConfirmButton: false,
      background: "#333333",
      timer: duration,
    }).then(function () {
      if (location !== "") {
        window.location.replace(location);
      } else {
        cb();
      }
    });
  }

  return;
}
