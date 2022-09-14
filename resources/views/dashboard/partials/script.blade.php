<script type="text/javascript">
  // notifications
  let notificationsMenu = document.querySelector(".dropdown-menu");
  let notificationsMenuItem = notificationsMenu.querySelectorAll("li").length;
  let notificationsNew = document.querySelector(".notifications-new");
  if (notificationsMenuItem > 0) {
    notificationsNew.style.display = "block";
  } else {
    notificationsNew.style.display = "none";
  }



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