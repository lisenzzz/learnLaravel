result=1
i=0
while (($result))
do
        echo "now it is ${i} time running!!!"
        sudo npm install --no-bin-links 2>temp
        i=`expr $i + 1`
        if [ $? ]
        then
                result=1
		strsource=$(tail -n 5 temp|head -n 1)
		strstatus=${strsource#*!}
		strstatus=${strstatus%:*}
		strstatus=${strstatus:14:7}
		if [ $strstatus == "ETXTBSY" ]
		then
			echo "ok,rename running!!!"
			strrename1=${strsource#*\'}
			strrename1=${strrename1%%\'*}
			strrename2=${strrename1%.*}
			echo "${strrename1} is transfering to ${strrename2}"
			mv ${strrename1} ${strrename2}
		else
			echo "what a pity!it is not a rename!"
		fi
        else
                result=0
                echo "finally finish!!!"
        fi
done
