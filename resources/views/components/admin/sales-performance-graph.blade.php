<article class="rounded-2xl border border-gray-800 bg-gray-900 p-5 sm:p-6">

    <!-- Header -->
    <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-start">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-orange-400">
                Revenue overview
            </p>

            <h3 class="mt-1 text-xl font-bold text-white">
                Sales performance
            </h3>
        </div>

        <div class="flex items-center gap-2 text-xs text-gray-500">
            <span class="flex items-center gap-2">
                <span class="h-2.5 w-2.5 rounded-full bg-orange-500"></span>
                Revenue
            </span>
        </div>
    </div>

    <!-- Chart -->
    <div class="mt-8 overflow-x-auto">
        <svg
            viewBox="0 0 620 300"
            class="h-auto min-w-[580px] w-full"
            role="img"
            aria-label="Static bar chart showing sales performance across four weeks">

            <!-- Grid lines -->
            <g stroke="#374151" stroke-dasharray="4 6" stroke-width="1">
                <line x1="60" y1="25" x2="590" y2="25"></line>
                <line x1="60" y1="80" x2="590" y2="80"></line>
                <line x1="60" y1="135" x2="590" y2="135"></line>
                <line x1="60" y1="190" x2="590" y2="190"></line>
            </g>

            <!-- Y-axis labels -->
            <g
                fill="#6b7280"
                font-size="11"
                font-family="Arial, sans-serif">
                <text x="20" y="29">80k</text>
                <text x="20" y="84">60k</text>
                <text x="20" y="139">40k</text>
                <text x="20" y="194">20k</text>
                <text x="27" y="249">0</text>
            </g>

            <!-- Baseline / 0 line -->
            <line
                x1="60"
                y1="245"
                x2="590"
                y2="245"
                stroke="#4b5563"
                stroke-width="2"></line>

            <!-- Week 1 -->
            <g>
                <rect
                    x="85"
                    y="130"
                    width="80"
                    height="115"
                    rx="12"
                    fill="#f97316"></rect>

                <rect
                    x="85"
                    y="130"
                    width="80"
                    height="8"
                    rx="4"
                    fill="#fb923c"></rect>

                <text
                    x="125"
                    y="117"
                    text-anchor="middle"
                    fill="#f8fafc"
                    font-size="11"
                    font-weight="600"
                    font-family="Arial, sans-serif">
                    PKR 42,000
                </text>

                <text
                    x="125"
                    y="267"
                    text-anchor="middle"
                    fill="#9ca3af"
                    font-size="11"
                    font-family="Arial, sans-serif">
                    Week 1
                </text>
            </g>

            <!-- Week 2 -->
            <g>
                <rect
                    x="215"
                    y="61"
                    width="80"
                    height="184"
                    rx="12"
                    fill="#f97316"></rect>

                <rect
                    x="215"
                    y="61"
                    width="80"
                    height="8"
                    rx="4"
                    fill="#fb923c"></rect>

                <text
                    x="255"
                    y="48"
                    text-anchor="middle"
                    fill="#f8fafc"
                    font-size="11"
                    font-weight="600"
                    font-family="Arial, sans-serif">
                    PKR 67,000
                </text>

                <text
                    x="255"
                    y="267"
                    text-anchor="middle"
                    fill="#9ca3af"
                    font-size="11"
                    font-family="Arial, sans-serif">
                    Week 2
                </text>
            </g>

            <!-- Week 3 -->
            <g>
                <rect
                    x="345"
                    y="97"
                    width="80"
                    height="148"
                    rx="12"
                    fill="#f97316"></rect>

                <rect
                    x="345"
                    y="97"
                    width="80"
                    height="8"
                    rx="4"
                    fill="#fb923c"></rect>

                <text
                    x="385"
                    y="84"
                    text-anchor="middle"
                    fill="#f8fafc"
                    font-size="11"
                    font-weight="600"
                    font-family="Arial, sans-serif">
                    PKR 54,000
                </text>

                <text
                    x="385"
                    y="267"
                    text-anchor="middle"
                    fill="#9ca3af"
                    font-size="11"
                    font-family="Arial, sans-serif">
                    Week 3
                </text>
            </g>

            <!-- Week 4 -->
            <g>
                <rect
                    x="475"
                    y="20"
                    width="80"
                    height="225"
                    rx="12"
                    fill="#f97316"></rect>

                <rect
                    x="475"
                    y="20"
                    width="80"
                    height="8"
                    rx="4"
                    fill="#fb923c"></rect>

                <text
                    x="515"
                    y="10"
                    text-anchor="middle"
                    fill="#f8fafc"
                    font-size="11"
                    font-weight="600"
                    font-family="Arial, sans-serif">
                    PKR 82,000
                </text>

                <text
                    x="515"
                    y="267"
                    text-anchor="middle"
                    fill="#9ca3af"
                    font-size="11"
                    font-family="Arial, sans-serif">
                    Week 4
                </text>
            </g>

        </svg>
    </div>

</article>