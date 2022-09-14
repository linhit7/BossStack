<script type="text/javascript">
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