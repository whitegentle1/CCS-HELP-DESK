<x-app-layout>
    <div class="flex w-full h-full">
        <!-- left -->
        <div
            class="flex-[0.25] p-5 justify-center items-center justify-items-center"
        >
            <iframe
                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdhvsu.ccssc&tabs=timeline&width=500&height=800&small_header=true&adapt_container_width=true&hide_cover=true&show_facepile=true&appId&colorscheme=dark"
                width="500"
                height="800"
                style="
                    border: none;
                    overflow: hidden;
                    border-radius: 20px;
                    display: block;
                    margin: 0 auto;
                    border: 1px solid #7b7b7b;
                "
                scrolling="no"
                frameborder="0"
                allowfullscreen="true"
                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
            ></iframe>
        </div>
        <!-- right -->
        <div class="flex flex-col flex-1 p-5">
            <!-- upper right -->
            <div class="flex">
                <div
                    class="flex-1 mx-2 my-1 p-1 bg-blue-100 border border-blue-800 rounded-lg"
                >
                    <p>Schedule</p>
                </div>
                <div
                    class="flex-1 mr-2 my-1 p-1 bg-blue-100 border border-blue-800 rounded-lg"
                >
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!4v1700428843838!6m8!1m7!1spp2EfgyDP2qAC0Pj8VtFaQ!2m2!1d14.99748320782215!2d120.654736154634!3f347.2585289809009!4f-8.655145907601948!5f0.7820865974627469"
                        width="600"
                        height="450"
                        style="
                            border: 0;
                            border-radius: 5px;
                            display: block;
                            margin: 0 auto;
                            border: 1px solid #7b7b7b;
                        "
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                    ></iframe>
                </div>
            </div>
            <!-- lower right -->
            <div
                class="flex-1 mx-2 my-1 p-1 h-20 bg-blue-100 border border-blue-800 rounded-lg"
            >
                <p>Audit Trail</p>
            </div>
        </div>
    </div>
</x-app-layout>
