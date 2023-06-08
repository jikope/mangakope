#!/bin/sh
echo "" > $2
for a in "${1}/"*; do
  echo "<img class='center-fit' src='$a' />" >> $2
done
