
<div class="container">
  @if( $title )
    <span style="float:left;margin-top: 7px;">{{ $title }}:</span>
  @endif
  <fieldset class="rating-my">
    <input type="radio" id="star5" name="rating" value="5" required/><label class = "full" for="star5" title="Потрясающие - 5 звезд"></label>
    <input type="radio" id="star4half" name="rating" value="4.55" /><label class="half" for="star4half" title="Отлично - 4.5 звезд"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Довольно хорошо - 4 звезды"></label>
    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Хорошо - 3.5 звезд"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Нормально - 3 звезды"></label>
    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Плохо - 2.5 звезд"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Очень плохо - 2 звезды"></label>
    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Очень плохо - 1.5 звезд"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Отстой - 1 звезда"></label>
    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Отстой - 0.5 звезд"></label>
  </fieldset>
</div>