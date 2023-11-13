
                    document.addEventListener('DOMContentLoaded', function () {
                        const drawer = document.querySelector('.drawer');
                        const paragraphElements = drawer.querySelectorAll('p');

                        paragraphElements.forEach(function (p) {
                            p.style.display = 'none';
                        });

                        drawer.addEventListener('mouseenter', function () {
                            drawer.classList.remove('w-20');
                            drawer.classList.add('w-60');

                            paragraphElements.forEach(function (p) {
                                p.style.display = 'block';
                            });
                        });

                        drawer.addEventListener('mouseleave', function () {
                            drawer.classList.remove('w-60');
                            drawer.classList.add('w-20');

                            paragraphElements.forEach(function (p) {
                                p.style.display = 'none';
                            });
                        });

                    });
