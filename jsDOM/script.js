const input = document.getElementById("itemInput");
const tombol = document.getElementById("tambahBtn");
const daftar = document.getElementById("daftarItem");

tombol.addEventListener("click", function () {
  const nilaiInput = input.value.trim();
  
  if (nilaiInput !== "") {
    const itemBaru = document.createElement("li");
    itemBaru.textContent = nilaiInput;

    const hapusBtn = document.createElement("button");
    hapusBtn.textContent = "Hapus";
    hapusBtn.style.marginLeft = "10px";

    hapusBtn.addEventListener("click", function () {
      itemBaru.remove();
    });

    itemBaru.appendChild(hapusBtn);

    daftar.appendChild(itemBaru);

    input.value = "";
  }
});
