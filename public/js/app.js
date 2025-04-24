// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    // Image slider
    const initSlider = () => {
        const slides = document.querySelectorAll('[data-slide]');
        const slideContents = document.querySelectorAll('[data-slide-content]');
        const dots = document.querySelectorAll('[data-slide-dot]');

        if (slides.length === 0) return;

        let currentSlide = 0;
        const slideCount = slides.length;

        // Initialize first slide
        slides[0].style.opacity = 1;
        slideContents[0].style.opacity = 1;
        dots[0].classList.add('bg-white');

        // Auto slide change
        const slideInterval = setInterval(nextSlide, 5000);

        function nextSlide() {
            goToSlide((currentSlide + 1) % slideCount);
        }

        function goToSlide(index) {
            // Fade out current slide
            slides[currentSlide].style.opacity = 0;
            slideContents[currentSlide].style.opacity = 0;
            dots[currentSlide].classList.remove('bg-white');

            // Update current slide
            currentSlide = index;

            // Fade in new slide
            slides[currentSlide].style.opacity = 1;
            slideContents[currentSlide].style.opacity = 1;
            dots[currentSlide].classList.add('bg-white');
        }

        // Add click handlers for dots
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                clearInterval(slideInterval);
                goToSlide(index);
            });
        });
    };

    initSlider();

    // Counter animation
    const animateCounters = () => {
        const counters = document.querySelectorAll('.counter');
        if (counters.length === 0) return;

        const speed = 200;

        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(updateCounter, 1);
            } else {
                counter.innerText = target + '+';
            }

            function updateCounter() {
                const current = +counter.innerText;
                if (current < target) {
                    counter.innerText = Math.ceil(current + increment);
                    setTimeout(updateCounter, 1);
                } else {
                    counter.innerText = target + '+';
                }
            }
        });
    };

    // Intersection Observer for counter animation
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.counter-section').forEach(section => {
        observer.observe(section);
    });

    // Filter functionality for team page
    const filterButtons = document.querySelectorAll('.filter-btn');
    const teamItems = document.querySelectorAll('.team-item');

    if (filterButtons.length > 0 && teamItems.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(b => b.classList.remove('active', 'bg-purple-600'));
                filterButtons.forEach(b => b.classList.add('bg-gray-800'));

                // Add active class to clicked button
                this.classList.add('active', 'bg-purple-600');
                this.classList.remove('bg-gray-800');

                const filterValue = this.getAttribute('data-filter');

                teamItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500');

                    // Remove error class after user starts typing
                    field.addEventListener('input', function() {
                        if (this.value.trim()) {
                            this.classList.remove('border-red-500');
                        }
                    });
                }
            });

            if (!isValid) {
                e.preventDefault();

                // Scroll to first error
                const firstError = form.querySelector('.border-red-500');
                if (firstError) {
                    firstError.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            }
        });
    });

    // Tooltip initialization
    const initTooltips = () => {
        const tooltipElements = document.querySelectorAll('[data-tooltip]');

        tooltipElements.forEach(el => {
            const tooltipText = el.getAttribute('data-tooltip');
            const tooltip = document.createElement('div');

            tooltip.className = 'absolute z-50 invisible bg-gray-900 text-white text-xs rounded py-1 px-2 whitespace-nowrap transform -translate-x-1/2 left-1/2 bottom-full mb-2 opacity-0 transition-opacity duration-300 group-hover:opacity-100 group-hover:visible';
            tooltip.textContent = tooltipText;

            el.appendChild(tooltip);
            el.classList.add('group', 'relative');
        });
    };

    initTooltips();
});
// Contact method toggles for cooperation form
const initContactMethodToggles = () => {
    const contactCheckboxes = document.querySelectorAll('input[name="contact_methods[]"]');

    contactCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const contactField = document.querySelector(`[data-contact-field="${this.value}"]`);
            if (contactField) {
                contactField.classList.toggle('hidden', !this.checked);
                if (this.checked) {
                    contactField.focus();
                }
            }
        });

        // Trigger change event on page load if checkbox is checked
        if (checkbox.checked) {
            checkbox.dispatchEvent(new Event('change'));
        }
    });
};

// Add this to the DOMContentLoaded event listener
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...

    initContactMethodToggles();

    // ... rest of the existing code ...
});
// Timeline animation effects
const initTimelineAnimations = () => {
    const timelineItems = document.querySelectorAll('.timeline-card, .timeline-future');

    timelineItems.forEach((item, index) => {
        item.addEventListener('mouseenter', () => {
            const icon = item.querySelector('.timeline-icon');
            if (icon) {
                icon.style.transform = 'scale(1.1) rotate(5deg)';
            }
        });

        item.addEventListener('mouseleave', () => {
            const icon = item.querySelector('.timeline-icon');
            if (icon) {
                icon.style.transform = 'scale(1) rotate(0)';
            }
        });
    });
};

// Add this to the DOMContentLoaded event listener
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...

    initTimelineAnimations();

    // ... rest of the existing code ...
});
// Concept page animations
const initConceptAnimations = () => {
    const conceptCards = document.querySelectorAll('.concept-card, .concept-mini-card');

    conceptCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const icon = card.querySelector('i');
            if (icon) {
                icon.style.transform = 'scale(1.1)';
            }
        });

        card.addEventListener('mouseleave', () => {
            const icon = card.querySelector('i');
            if (icon) {
                icon.style.transform = 'scale(1)';
            }
        });
    });
};

// Add this to the DOMContentLoaded event listener
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...

    initConceptAnimations();

    // ... rest of the existing code ...
});
// Server status auto-refresh
const initServerStatusRefresh = () => {
    const statusTable = document.querySelector('#server-status table');
    if (!statusTable) return;

    let refreshInterval = 300000; // 5 minutes

    const refreshStatus = async () => {
        try {
            const response = await fetch('/api/server-status');
            if (response.ok) {
                const data = await response.json();
                updateStatusTable(data.servers);
            }
        } catch (error) {
            console.error('Error refreshing server status:', error);
        }
    };

    const updateStatusTable = (servers) => {
        // In a real application, we would update the table with new data
        console.log('Updating server status data:', servers);

        // Update last refresh time
        const refreshTimeElement = document.querySelector('.last-refresh-time');
        if (refreshTimeElement) {
            refreshTimeElement.textContent = `Letzte Aktualisierung: ${new Date().toLocaleString('de-DE')} Uhr`;
        }
    };

    // Start auto-refresh
    const refreshIntervalId = setInterval(refreshStatus, refreshInterval);

    // Manual refresh button (if added later)
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('refresh-status-btn')) {
            e.preventDefault();
            refreshStatus();
        }
    });

    // Cleanup on page navigation
    document.addEventListener('turbolinks:before-visit', () => {
        clearInterval(refreshIntervalId);
    });
};

// Add this to the DOMContentLoaded event listener
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...

    initServerStatusRefresh();

    // ... rest of the existing code ...
});
