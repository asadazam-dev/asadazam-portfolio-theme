/*! Asad Azam Portfolio v1.0.5 - minified production JS */
const root = document.documentElement;
 const themeToggle = document.getElementById('themeToggle');
 const STORAGE_KEY = 'asad-portfolio-theme';
 function setTheme(theme) {
 root.setAttribute('data-theme', theme);
 document.querySelector('meta[name="theme-color"]').setAttribute(
 'content', theme === 'dark' ? '#0c0a09' : '#f7f3ea'
 );
 try { localStorage.setItem(STORAGE_KEY, theme); } catch(e) {}
 }
 function initTheme() {
 let saved = null;
 try { saved = localStorage.getItem(STORAGE_KEY); } catch(e) {}
 if (saved) { setTheme(saved); return; }
 const prefersLight = window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches;
 setTheme(prefersLight ? 'light' : 'dark');
 }
 initTheme();
 themeToggle.addEventListener('click', () => {
 const current = root.getAttribute('data-theme');
 setTheme(current === 'dark' ? 'light' : 'dark');
 });
 const timeEl = document.getElementById('liveTime');
 function tick() {
 if (!timeEl) return;
 const now = new Date();
 const utc = now.getTime() + (now.getTimezoneOffset() * 60000);
 const kar = new Date(utc + (5 * 3600000));
 const hh = String(kar.getHours()).padStart(2, '0');
 const mm = String(kar.getMinutes()).padStart(2, '0');
 const ss = String(kar.getSeconds()).padStart(2, '0');
 timeEl.textContent = `${hh}:${mm}:${ss}`;
 }
 tick(); setInterval(tick, 1000);
 const nav = document.getElementById('nav');
 window.addEventListener('scroll', () => {
 nav.classList.toggle('scrolled', window.scrollY > 20);
 }, { passive: true });
 const io = new IntersectionObserver((entries) => {
 entries.forEach((e) => {
 if (e.isIntersecting) {
 e.target.classList.add('in');
 io.unobserve(e.target);
 e.target.querySelectorAll('.counter').forEach(animateCounter);
 }
 });
 }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
 document.querySelectorAll('.reveal').forEach((el, i) => {
 el.style.transitionDelay = ((i % 5) * 60) + 'ms';
 io.observe(el);
 });
 function animateCounter(el) {
 if (el.dataset.done) return;
 el.dataset.done = '1';
 const target = parseInt(el.dataset.target, 10) || 0;
 const duration = 1400;
 const start = performance.now();
 el.textContent = '0'; 
 function frame(now) {
 const t = Math.min(1, (now - start) / duration);
 const eased = 1 - Math.pow(1 - t, 3);
 el.textContent = Math.round(target * eased);
 if (t < 1) requestAnimationFrame(frame);
 else el.textContent = target;
 }
 requestAnimationFrame(frame);
 }
 document.querySelectorAll('a[href^="#"]').forEach((a) => {
 a.addEventListener('click', (e) => {
 const id = a.getAttribute('href');
 if (id && id.length > 1) {
 const t = document.querySelector(id);
 if (t) {
 e.preventDefault();
 t.scrollIntoView({ behavior: 'smooth', block: 'start' });
 }
 }
 });
 });
 const mq = document.querySelector('.marquee__track');
 if (mq) {
 mq.parentElement.addEventListener('mouseenter', () => mq.style.animationPlayState = 'paused');
 mq.parentElement.addEventListener('mouseleave', () => mq.style.animationPlayState = 'running');
 }
 document.querySelectorAll('.faq__q').forEach((btn) => {
 btn.addEventListener('click', () => {
 const item = btn.parentElement;
 const wasOpen = item.classList.contains('open');
 document.querySelectorAll('.faq__item.open').forEach(i => i.classList.remove('open'));
 if (!wasOpen) item.classList.add('open');
 });
 });
 const filterBtns = document.querySelectorAll('.work__filter');
 const projects = document.querySelectorAll('.project');
 filterBtns.forEach(btn => {
 btn.addEventListener('click', () => {
 const filter = btn.dataset.filter;
 filterBtns.forEach(b => b.classList.remove('active'));
 btn.classList.add('active');
 projects.forEach(p => {
 const cat = p.dataset.cat;
 if (filter === 'all' || cat === filter) {
 p.classList.remove('hidden');
 } else {
 p.classList.add('hidden');
 }
 });
 });
 });
 document.addEventListener('keydown', (e) => {
 if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
 e.preventDefault();
 document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' });
 }
 });