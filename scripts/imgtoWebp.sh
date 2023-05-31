for file in *.png *.jpg *.jpeg; do 
    cwebp -q 80 "$file" -o "${file%.*}.webp"
done
