@foreach ($experts as $expert)
<div class="expert-card">
    <div class="card-body">
        <div class="profile">
            <div class="avatar">
                <img src="{{ $expert->profile_image ?? 'https://via.placeholder.com/80' }}">
                <span class="status {{ $expert->is_online ? 'online' : 'offline' }}"></span>
            </div>

            <div class="info">
                <h3>{{ $expert->name }}</h3>
                <p class="role">{{ $expert->role }}</p>

                <div class="rating">
                    ★★★★★ <span>({{ $expert->formatted_rating }})</span>
                </div>

                <p class="convo">Conversations: {{ $expert->total_conversations }}</p>
            </div>
        </div>

        <div class="details">
            <p>📅 <strong>Next Available Appointment:</strong>
                {{ optional($expert->next_available_date)->format('D, d M') ?? 'N/A' }}
            </p>
            <P>🕒 <strong>Chat schedule:</strong>
                {{ $expert->chat_schedule
                ? $expert->chat_schedule->format('D, h A') . ' - ' . $expert->chat_schedule->copy()->addHours(2)->format('h A')
                : 'N/A' }}

            </P>
            <a href="#" class="see-more" data-id="{{ $expert->id }}">
                See More &gt;
            </a>
        </div>
    </div>

    <div class="card-footer">
        <button>CHAT</button>
        <button>MESSAGE</button>
        <button>APPOINTMENT</button>
    </div>
</div>
@endforeach