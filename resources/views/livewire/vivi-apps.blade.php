<div>
   @foreach ($this->apps as $app)
       <livewire:vivi-app :app="$app" :key="$app->id" />
   @endforeach
</div>
