document.addEventListener('click', function(event) {
  const sidebarLeft = document.getElementById('sidebarLeft');
  const sidebarRight = document.getElementById('sidebarRight');
  const target = event.target;

  // Toggle visibility logic
  const toggleLeft = document.querySelector('[data-bs-target="#sidebarLeft"]');
  const toggleRight = document.querySelector('[data-bs-target="#sidebarRight"]');

  if (sidebarLeft.classList.contains('show')) {
    if (!sidebarLeft.contains(target) && !toggleLeft.contains(target)) {
      const bsCollapseLeft = bootstrap.Collapse.getInstance(sidebarLeft);
      if (bsCollapseLeft) bsCollapseLeft.hide();
    }
  }

  if (sidebarRight.classList.contains('show')) {
    if (!sidebarRight.contains(target) && !toggleRight.contains(target)) {
      const bsCollapseRight = bootstrap.Collapse.getInstance(sidebarRight);
      if (bsCollapseRight) bsCollapseRight.hide();
    }
  }

  // Show/hide toggle buttons based on sidebar state
  toggleLeft.classList.toggle('d-none', sidebarLeft.classList.contains('show'));
  toggleRight.classList.toggle('d-none', sidebarRight.classList.contains('show'));
});