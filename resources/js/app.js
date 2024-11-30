import './bootstrap';
import 'preline';

// Tunggu sampai DOM selesai dimuat
document.addEventListener('DOMContentLoaded', function() {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const darkModeToggle2 = document.getElementById('darkModeToggle2');
    const html = document.documentElement;

    // Fungsi untuk mengubah mode
    function toggleDarkMode() {
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
        }
    }

    // Tambahkan event listener untuk tombol
    darkModeToggle.addEventListener('click', toggleDarkMode);
    darkModeToggle2.addEventListener('click', toggleDarkMode);

    // Cek preferensi yang tersimpan
    const savedTheme = localStorage.getItem('theme');
    
    // Terapkan tema berdasarkan preferensi yang tersimpan
    if (savedTheme) {
        if (savedTheme === 'dark') {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }
    }

    // Opsional: Deteksi preferensi sistem
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');
    
    prefersDark.addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            if (e.matches) {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }
        }
    });
});

// PARTICLE JS
const initParticles = () => {
    particlesJS('particles-js', {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#6366f1"
            },
            "shape": {
                "type": "circle"
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#6366f1",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 3,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
            }
        },
        "interactivity": {
            "detect_on": "window", // Ubah ke window untuk deteksi lebih baik
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse" // Ubah ke grab untuk efek tarik
                },
                "onclick": {
                    "enable": true,
                    "mode": "push" // Ubah ke bubble untuk efek klik
                },
                "resize": true,
                "touchstart": { // Tambah support sentuh
                    "enable": true,
                    "mode": "push"
                },
                "touchmove": { // Tambah support geser
                    "enable": true,
                    "mode": "grab"
                }
            },
            "modes": {
                "grab": {
                    "distance": 140,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 0.8,
                    "speed": 3
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
};

// Export untuk digunakan di file lain jika diperlukan
window.initParticles = initParticles;
// END PARTICLE JS
