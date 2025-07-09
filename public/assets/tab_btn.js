// Tab functionality with dynamic variant handling
document.querySelectorAll('.tab-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    const variant = btn.getAttribute('data-variant');

    document.querySelectorAll('.tab-btn').forEach(b => {
      const bVariant = b.getAttribute('data-variant');
      b.classList.remove(`btn-${bVariant}`, 'active');
      b.classList.add(`btn-outline-${bVariant}`);
    });

    btn.classList.remove(`btn-outline-${variant}`);
    btn.classList.add(`btn-${variant}`, 'active');

    const target = btn.getAttribute('data-target');
    document.querySelectorAll('.tab-content').forEach(section => {
      section.style.display = 'none';
      section.classList.remove('show');
    });

    const sectionToShow = document.querySelector(target);
    sectionToShow.style.display = 'block';
    setTimeout(() => sectionToShow.classList.add('show'), 10);
  });
});