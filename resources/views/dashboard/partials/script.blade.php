<script type="text/javascript">
  // notifications
  let navbarNotifications = document.querySelectorAll(".navbar-custom-menu");
  navbarNotifications.forEach(element => {
    let notificationsMenu = element.querySelector(".dropdown-menu");
    let notificationsMenuItem = notificationsMenu.querySelectorAll("li").length;
    let notificationsNew = element.querySelectorAll(".notifications-new");
    notificationsNew.forEach(elementChild => {
      if (notificationsMenuItem > 0) {
        elementChild.style.display = "block";
      } else {
        elementChild.style.display = "none";
      }
    })
  });


  // financial planning
  let selectPlanList = document.querySelector(".financial-planning-list");
  let widthPlanList = selectPlanList.clientWidth;
  let widthPlanItem = document.querySelector(".financial-planning-item").offsetWidth;
  let lengthLlanItems = document.querySelectorAll(".financial-planning-item").length;
  let totalWidthPlanItem = widthPlanItem * lengthLlanItems;
  if (totalWidthPlanItem => widthPlanList) {
    document.querySelector(".financial-planning-list").style.overflowX = "auto";
    selectPlanList.querySelector(".wrap").style.width = `${totalWidthPlanItem}px`;
  }else{
    document.querySelector(".financial-planning-list").style.overflowX = "hidden";
  }
</script>