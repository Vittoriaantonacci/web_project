// Tab functionality for the post saved section
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

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