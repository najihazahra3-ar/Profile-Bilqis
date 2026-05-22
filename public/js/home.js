const menuToggle = document.querySelector('#menuToggle');
const navMenu = document.querySelector('#navMenu');

menuToggle?.addEventListener('click', () => {
    navMenu.classList.toggle('open');
});

document.querySelectorAll('.nav-menu a').forEach((link) => {
    link.addEventListener('click', () => navMenu.classList.remove('open'));
});

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
}, { threshold: 0.16 });

document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));

function initCarousels() {
    document.querySelectorAll('.carousel').forEach((carousel) => {
        const track = carousel.querySelector('.carousel-track');
        const slides = Array.from(track.children);
        const nextButton = carousel.querySelector('.carousel-button.next');
        const prevButton = carousel.querySelector('.carousel-button.prev');
        const indicators = Array.from(carousel.querySelectorAll('.carousel-indicators button'));
        const autoplayDelay = Number(carousel.dataset.autoplay) || 5000;
        let currentIndex = 0;
        let interval = null;

        const updateState = (index) => {
            currentIndex = (index + slides.length) % slides.length;
            track.style.transform = `translateX(${-currentIndex * 100}%)`;
            indicators.forEach((button, btnIndex) => {
                button.classList.toggle('active', btnIndex === currentIndex);
            });
        };

        const startAutoplay = () => {
            if (interval) {
                clearInterval(interval);
            }
            interval = setInterval(() => {
                updateState(currentIndex + 1);
            }, autoplayDelay);
        };

        const resetAutoplay = () => {
            if (autoplayDelay > 0) {
                startAutoplay();
            }
        };

        if (prevButton) {
            prevButton.addEventListener('click', () => {
                updateState(currentIndex - 1);
                resetAutoplay();
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', () => {
                updateState(currentIndex + 1);
                resetAutoplay();
            });
        }

        indicators.forEach((button, index) => {
            button.addEventListener('click', () => {
                updateState(index);
                resetAutoplay();
            });
        });

        updateState(0);
        if (slides.length > 1) {
            startAutoplay();
        }
    });
}

initCarousels();

const canvas = document.querySelector('#heroCharacter');

if (canvas && window.THREE) {
    const scene = new THREE.Scene();
    const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
    const camera = new THREE.PerspectiveCamera(35, 1, 0.1, 100);
    const bunny = new THREE.Group();
    let targetRotationX = 0;
    let targetRotationY = -0.12;

    camera.position.set(0, 0.35, 6.8);
    scene.add(bunny);

    const keyLight = new THREE.DirectionalLight(0xffffff, 3.1);
    keyLight.position.set(4, 5, 7);
    scene.add(keyLight);

    const fillLight = new THREE.DirectionalLight(0xffe1ea, 1.5);
    fillLight.position.set(-4, 2, 4);
    scene.add(fillLight);
    scene.add(new THREE.AmbientLight(0xfff5ee, 1.75));

    const fur = new THREE.MeshStandardMaterial({ color: 0xfffdf9, roughness: 0.46 });
    const furShade = new THREE.MeshStandardMaterial({ color: 0xf0ece6, roughness: 0.52 });
    const innerEar = new THREE.MeshStandardMaterial({ color: 0xf7b6c8, roughness: 0.5 });
    const ink = new THREE.MeshStandardMaterial({ color: 0x3f2d2f, roughness: 0.48 });
    const blush = new THREE.MeshStandardMaterial({ color: 0xf4a7bb, roughness: 0.52 });
    const shine = new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.32 });

    function capsule(radius, length, material) {
        return new THREE.Mesh(new THREE.CapsuleGeometry(radius, length, 16, 28), material);
    }

    const head = new THREE.Mesh(new THREE.SphereGeometry(1.28, 64, 64), fur);
    head.scale.set(1.02, 0.96, 0.94);
    head.position.y = -0.22;
    bunny.add(head);

    const leftEar = capsule(0.28, 1.65, fur);
    const rightEar = capsule(0.28, 1.65, fur);
    leftEar.position.set(-0.48, 1.18, -0.05);
    rightEar.position.set(0.48, 1.18, -0.05);
    leftEar.rotation.z = -0.16;
    rightEar.rotation.z = 0.16;
    leftEar.scale.set(0.78, 1, 0.52);
    rightEar.scale.copy(leftEar.scale);
    bunny.add(leftEar, rightEar);

    const leftInner = capsule(0.16, 1.18, innerEar);
    const rightInner = capsule(0.16, 1.18, innerEar);
    leftInner.position.set(-0.48, 1.18, 0.18);
    rightInner.position.set(0.48, 1.18, 0.18);
    leftInner.rotation.z = -0.16;
    rightInner.rotation.z = 0.16;
    leftInner.scale.set(0.62, 1, 0.18);
    rightInner.scale.copy(leftInner.scale);
    bunny.add(leftInner, rightInner);

    const muzzleLeft = new THREE.Mesh(new THREE.SphereGeometry(0.32, 36, 36), furShade);
    const muzzleRight = muzzleLeft.clone();
    muzzleLeft.position.set(-0.2, -0.5, 1.06);
    muzzleRight.position.set(0.2, -0.5, 1.06);
    muzzleLeft.scale.set(1, 0.76, 0.28);
    muzzleRight.scale.copy(muzzleLeft.scale);
    bunny.add(muzzleLeft, muzzleRight);

    const leftEye = new THREE.Mesh(new THREE.SphereGeometry(0.095, 24, 24), ink);
    const rightEye = leftEye.clone();
    leftEye.position.set(-0.38, -0.08, 1.16);
    rightEye.position.set(0.38, -0.08, 1.16);
    leftEye.scale.set(0.9, 1.14, 0.32);
    rightEye.scale.copy(leftEye.scale);
    bunny.add(leftEye, rightEye);

    const leftEyeShine = new THREE.Mesh(new THREE.SphereGeometry(0.03, 12, 12), shine);
    const rightEyeShine = leftEyeShine.clone();
    leftEyeShine.position.set(-0.41, -0.03, 1.23);
    rightEyeShine.position.set(0.34, -0.03, 1.23);
    bunny.add(leftEyeShine, rightEyeShine);

    const nose = new THREE.Mesh(new THREE.SphereGeometry(0.095, 24, 24), innerEar);
    nose.position.set(0, -0.38, 1.32);
    nose.scale.set(1.2, 0.78, 0.42);
    bunny.add(nose);

    const mouthLeft = new THREE.Mesh(new THREE.TorusGeometry(0.105, 0.01, 8, 22, Math.PI), ink);
    const mouthRight = mouthLeft.clone();
    mouthLeft.position.set(-0.07, -0.56, 1.27);
    mouthRight.position.set(0.07, -0.56, 1.27);
    mouthLeft.rotation.z = Math.PI * 1.08;
    mouthRight.rotation.z = Math.PI * 0.92;
    bunny.add(mouthLeft, mouthRight);

    const blushLeft = new THREE.Mesh(new THREE.SphereGeometry(0.09, 18, 18), blush);
    const blushRight = blushLeft.clone();
    blushLeft.position.set(-0.66, -0.38, 1.02);
    blushRight.position.set(0.66, -0.38, 1.02);
    blushLeft.scale.set(1.55, 0.55, 0.16);
    blushRight.scale.copy(blushLeft.scale);
    bunny.add(blushLeft, blushRight);

    const whiskerMaterial = ink;
    const whiskers = [
        [-0.52, -0.47, 1.18, -0.35],
        [-0.54, -0.58, 1.16, -0.12],
        [-0.52, -0.69, 1.12, 0.12],
        [0.52, -0.47, 1.18, 0.35],
        [0.54, -0.58, 1.16, 0.12],
        [0.52, -0.69, 1.12, -0.12],
    ];

    whiskers.forEach(([x, y, z, rz]) => {
        const whisker = capsule(0.01, 0.48, whiskerMaterial);
        whisker.position.set(x, y, z);
        whisker.rotation.z = rz + (x < 0 ? Math.PI / 2 : -Math.PI / 2);
        whisker.rotation.y = x < 0 ? -0.15 : 0.15;
        bunny.add(whisker);
    });

    const foreheadPuff = new THREE.Mesh(new THREE.SphereGeometry(0.2, 24, 24), furShade);
    foreheadPuff.position.set(0, 0.56, 0.95);
    foreheadPuff.scale.set(1, 0.74, 0.26);
    bunny.add(foreheadPuff);

    const softShadow = new THREE.Mesh(new THREE.TorusGeometry(1.02, 0.04, 12, 72), new THREE.MeshStandardMaterial({
        color: 0xf0aa7f,
        transparent: true,
        opacity: 0.28,
        roughness: 0.5,
    }));
    softShadow.position.set(0, -1.34, 0.05);
    softShadow.rotation.x = Math.PI / 2;
    softShadow.scale.set(1.25, 0.36, 1);
    bunny.add(softShadow);

    bunny.rotation.y = targetRotationY;
    bunny.scale.setScalar(1.14);

    function resize() {
        const rect = canvas.getBoundingClientRect();
        renderer.setSize(rect.width, rect.height, false);
        camera.aspect = rect.width / rect.height;
        camera.updateProjectionMatrix();
    }

    canvas.addEventListener('mousemove', (event) => {
        const rect = canvas.getBoundingClientRect();
        targetRotationY = ((event.clientX - rect.left) / rect.width - 0.5) * 0.72;
        targetRotationX = ((event.clientY - rect.top) / rect.height - 0.5) * 0.24;
    });

    canvas.addEventListener('mouseleave', () => {
        targetRotationX = 0;
        targetRotationY = -0.12;
    });

    function animate(time) {
        resize();
        bunny.rotation.y += (targetRotationY - bunny.rotation.y) * 0.08;
        bunny.rotation.x += (targetRotationX - bunny.rotation.x) * 0.08;
        bunny.position.y = Math.sin(time * 0.0015) * 0.08;
        leftEar.rotation.z = -0.16 + Math.sin(time * 0.0018) * 0.025;
        rightEar.rotation.z = 0.16 - Math.sin(time * 0.0018) * 0.025;
        leftInner.rotation.z = leftEar.rotation.z;
        rightInner.rotation.z = rightEar.rotation.z;
        renderer.render(scene, camera);
        requestAnimationFrame(animate);
    }

    animate(0);
}
