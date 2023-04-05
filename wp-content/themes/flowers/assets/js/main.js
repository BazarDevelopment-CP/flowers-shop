const forms = document.querySelectorAll("#contact-us  form");
if (forms.length) {
  forms.forEach((form) => {
    form.addEventListener("submit", async (e) => {
      //   e.preventDefault();
      const formData = new FormData(form);

      const res = await fetch(form.attributes.action.value, {
        method: form.attributes.method.value,
        body: formData,
      }).then((res) => res.json());

      //запит розкоментувати і рес = тру видалили, має працювати на серваку

      //   const res = true;
    });
  });
}
const anchors = document.querySelectorAll('a[href*="#"]');
for (let anchor of anchors) {
  anchor.addEventListener("click", function (event) {
    event.preventDefault();
    const blockID = anchor.getAttribute("href");
    document.querySelector("" + blockID).scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
  });
}
$(document).ready(function () {
  $(".header-burger").click(function (event) {
    $(".header-nav").toggleClass("active");
    $(".header-burger").toggleClass("active");
  });
  $(".guestion-item").click(function (event) {
    // $(".answer").toggleClass("open");
    $(this).closest("li").find(".answer").toggleClass("open");
    $(this).closest("li").find("img").toggleClass("open");
  });
  $(".description-top").click(function (event) {
    $(".description-body").toggleClass("open");
    $(".description-top").find("img").toggleClass("open");
  });
  $(".category").click(function (event) {
    $(".category-list").toggleClass("active");
    $(this).closest("div").find("img").toggleClass("active");
  });
  $(".sort").click(function (event) {
    $(".sort-list").toggleClass("active");
    $(this).closest("div").find("img").toggleClass("active");
  });
  $(".options-btn").click(function (event) {
    $(this).closest("tr").find(".variation-list").toggleClass("active");
    $(this).find("img").toggleClass("active");
  });
  $(".variation-item").click(function (event) {
    $(this).closest("ul").find(".variation-item").removeClass("select");
    // $(".variation-item").removeClass("select");
    $(this).toggleClass("select");
    $(".options-btn span").text($(".select").text());
  });
  // $(".step-body .btn").click(function (event) {
  //   $(this)
  //     .closest("li")
  //     .next("li")
  //     .find(".step-body")
  //     .removeClass("hidden-step");
  // });

  const radiobuttonsIni = () => {
    $.each($(".radiobuttons-item"), function (index, val) {
      if (
        $(this).find("input[type=radio]").prop("checked") == true ||
        $(this).find("input[type=hidden]").length
      ) {
        $(this).addClass("check");
      }
    });
  };
  radiobuttonsIni();
  $(document).on("DOMSubtreeModified", radiobuttonsIni);
  $(document).on("click", ".radiobuttons-item", function (event) {
    $(this)
      .parents("#shipping_method")
      .find(".radiobuttons-item")
      .removeClass("check");
    $(this)
      .parents("#shipping_method")
      .find(".radiobuttons-item input[type=radio]")
      .prop("checked", false);
    $(this).toggleClass("check");
    $(this).find("input[type=radio]").prop("checked", true);
    $(this).find("input[type=radio]").trigger("change");
    return false;
  });
  // change quantity
  $(document).on("click", ".change-quantity", function (e) {
    let currentItem = $(this).closest(".quantity");
    let quantityInput = currentItem.find(".input-quantity");
    let quantity = parseInt(quantityInput.val());
    let newQuantity = 0;
    if ($(this).hasClass("plus")) {
      newQuantity = quantity + 1;
    }
    if ($(this).hasClass("minus")) {
      newQuantity = quantity == 0 ? quantity : quantity - 1;
    }
    quantityInput.attr("value", newQuantity);
    currentItem.find(".amount").text(newQuantity);
    if ($("[name=update_cart]").length) {
      $("[name=update_cart]").prop({ disabled: false, "aria-disabled": false });
      $("[name=update_cart]").trigger("click");
    }
  });
  // choose variation
  $(".variations_form .variation-item").on("click", function (e) {
    let variatName = $(this).closest(".variation-list").attr("data-name");
    let variatSelect = $(`select[name=${variatName}]`);
    variatSelect.find("option").removeProp("selected");
    variatSelect
      .find(`option[value='${$(this).attr("data-value")}']`)
      .prop("selected", "selected");
    variatSelect.trigger("change");
  });
  // update checkout
  $(document).on("change", "input[name=billing_postcode]", function (e) {
    $(document.body).trigger("update_checkout");
  });
});

// const filterSlide = document.querySelectorAll(".swiper-slide");
// console.log(filterSlide);
// document.querySelector(".service-filter-list").addEventListener("click", (event) => {
//   if (event.target.tagName !== "LI") return false;
//   let filterClass = event.target.dataset["f"];
//   filterSlide.forEach((elem) => {
//     elem.style.display = "flex";
//     if (!elem.classList.contains(filterClass) && filterClass !== "All") {
//       elem.style.display = "none";
//     }
//   });
// });
