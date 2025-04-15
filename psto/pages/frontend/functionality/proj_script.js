const dropdown = document.getElementById("project_types");
const gia = document.getElementById("gia");
const setup = document.getElementById("setup");
const sscp = document.getElementById("sscp");
const cest = document.getElementById("cest");

dropdown.addEventListener("change", () => {
  switch (dropdown.value) {
    case "1":
      gia.classList.remove("hidden");
      setup.classList.add("hidden");
      sscp.classList.add("hidden");
      cest.classList.add("hidden");
      break;
    case "2":
      gia.classList.add("hidden");
      setup.classList.remove("hidden");
      sscp.classList.add("hidden");
      cest.classList.add("hidden");
      break;
    case "3":
      gia.classList.add("hidden");
      setup.classList.add("hidden");
      sscp.classList.add("hidden");
      cest.classList.remove("hidden");
      break;
    case "4":
      gia.classList.add("hidden");
      setup.classList.add("hidden");
      sscp.classList.remove("hidden");
      cest.classList.add("hidden");
      break;
    default:
      gia.classList.add("hidden");
      setup.classList.add("hidden");
      sscp.classList.add("hidden");
      cest.classList.add("hidden");
  }
});
